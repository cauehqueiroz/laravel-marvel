<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Comic;
use App\Models\CharacterComic;
use DB;

class CharacterController extends Controller
{
    /**
     * Returns a JSON list of characters
     * Can be filtered by: name
     */
    public function all(Character $object, Request $request)
    {
        $data = $request->all();
        $response['characters'] = $object->where(function ($query) use ($data) {
            if (isset($data['name'])) {
                $query->where('name', 'like', "{$data['name']}%");
            }
        })->orderBy('name', 'ASC')->get();
        return response()
            ->json($response);
    }

    /**
     * Returns a single character by ID
     */
    public function getSingle(int $characterId, Character $character)
    {
        $object = $character->findOrFail($characterId);

        return response()
            ->json([
                'character' => $object
            ]);
    }

    /**
     * Persist a character
     */
    public function store(Character $character, Request $request)
    {
        $character = $this->save($character, $request);
        return response()
            ->json([
                'character' => $character
            ]);
    }

    /**
     * Updates a character
     */
    public function update(int $characterId, Character $character, Request $request)
    {
        $character = $character->findOrFail($characterId);

        if ($character) {
            $character = $this->save($character, $request);
        }

        return response()
            ->json([
                'character' => $character
            ]);
    }

    /**
     * Persist the characters info in the database
     */
    private function save(Character $character, Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $character->fill($data);
            $character->save();
            if ($data['comics'] && count($data['comics']) > 0) {
                foreach ($data['comics'] as $comicData) {
                    $hasComicId = isset($comicData['id']) && !empty($comicData['id']);
                    $comic = $hasComicId ?
                        Comic::findOrFail($comicData['id']) :
                        new Comic();
                    $comic->fill($comicData);
                    $comic->save();

                    if (!$hasComicId) {
                        $characterComic = new CharacterComic([
                            'character_id' => $character->id,
                            'comic_id' => $comic->id,
                        ]);
                        $characterComic->save();
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return $character;
    }

    /**
     * Returns a list of comics from a character by its ID
     */
    public function getComics(int $characterId, Character $character)
    {
        $object = $character->findOrFail($characterId);
        $response = $object ? $object->comics()->get() : [];
        return response()
            ->json([
                'comics' => $response
            ]);
    }
}
