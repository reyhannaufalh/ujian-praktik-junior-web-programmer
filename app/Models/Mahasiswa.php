<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $guarded = ['id'];

    /**
     * The scopeSearch function in PHP is used to search for records in a database table based on a
     * specified criteria.
     * 
     * @param query The `` parameter in the `scopeSearch` function is the query builder instance
     * that represents the current query being built. It allows you to add conditions, filters, and
     * other query operations to the current query.
     * @param s The parameter `` in the `scopeSearch` function is used to specify the search term
     * that will be used to filter the results. In this case, it is searching for records where the
     * 'nama' column contains the value specified in ``. The `%` symbols are used for wildcard
     * matching
     * 
     * @return The `scopeSearch` function is returning a query that filters records where the 'nama'
     * column is like the search term provided (``). The search term is enclosed in wildcard
     * characters (%) to perform a partial match search.
     */
    public function scopeSearch($query, $s)
    {
        return $query->where('nama', 'like', '%' . $s . '%');
    }

    /**
     * This PHP function retrieves a list of Mahasiswa (students) based on their gender.
     * 
     * @param gender The `getMahasiswaByGender` function is a static method that retrieves a collection
     * of Mahasiswa (students) based on the specified gender. The function takes a parameter ``
     * which is used to filter the Mahasiswa records by their gender.
     * 
     * @return The function `getMahasiswaByGender` is returning a collection of Mahasiswa (students)
     * with the specified gender.
     */
    public static function getMahasiswaByGender($gender)
    {
        return self::where('gender', $gender)->get();
    }
}