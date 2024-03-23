<?php

namespace App\Services;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Log;

class MahasiswaService
{
    /**
     * The function stores validated data for a Mahasiswa model in PHP and returns the result or false
     * if an exception occurs.
     * 
     * @param validatedData The `store` function you provided is a method that attempts to create a new
     * record in the `Mahasiswa` model using the `` provided as input. If the creation is
     * successful, it returns the result, otherwise, it catches any exceptions thrown and returns
     * `false`.
     * 
     * @return The `store` function is returning the result of creating a new `Mahasiswa` record using
     * the ``. If the creation is successful, it returns the result object. If an
     * exception occurs during the creation process, it returns `false`.
     */
    public function store($validatedData)
    {
        try {
            $result = Mahasiswa::create($validatedData);

            return $result;
        } catch (\Exception $e) {
            Log::error("message: " . $e->getMessage());
            return false;
        }
    }

    /**
     * The function updates a Mahasiswa object with validated data and returns true if successful,
     * false otherwise.
     * 
     * @param validatedData The `` parameter in the `update` function is typically an
     * array of data that has been validated and is ready to be used to update the `Mahasiswa` model
     * instance. This data could include fields such as name, email, address, etc., depending on what
     * information needs to be
     * @param Mahasiswa mahasiswa `` is an instance of the `Mahasiswa` class, which
     * represents a student in this context. The `update` method is used to update the attributes of
     * the student object with the validated data provided as the first parameter.
     * 
     * @return The `update` method is returning a boolean value. It returns `true` if the update
     * operation is successful and `false` if an exception occurs during the update operation.
     */
    public function update($validatedData, Mahasiswa $mahasiswa)
    {
        try {
            $mahasiswa->update($validatedData);

            return true;
        } catch (\Exception $e) {
            Log::error("message: " . $e->getMessage());
            return false;
        }
    }

    /**
     * The function deletes a Mahasiswa object and returns true if successful, otherwise false.
     * 
     * @param Mahasiswa mahasiswa The `delete` function is a method that takes an instance of the
     * `Mahasiswa` class as a parameter. It attempts to delete the provided `Mahasiswa` object from the
     * database. If the deletion is successful, it returns `true`. If an exception occurs during the
     * deletion process, it catches
     * 
     * @return The `delete` method is attempting to delete a `Mahasiswa` object. If the deletion is
     * successful, it will return `true`. If an exception occurs during the deletion process, it will
     * return `false`.
     */
    public function delete(Mahasiswa $mahasiswa)
    {
        try {
            $mahasiswa->delete();

            return true;
        } catch (\Exception $e) {
            Log::error("message: " . $e->getMessage());
            return false;
        }
    }
}