<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Product
 * @package App\Models
 *
 * @property string $title
 * @property string $description
 * @property double $price
 * @property int $qty
 * @property bool $deleted
 */
class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'qty',
        'deleted',
    ];

    /**
     * @return mixed
     */
    public static function getList()
    {
        $user = Auth::user();

        return self::where(['userId' => $user->id, 'deleted' => false])->get()->keyBy('id')->all();
    }

    /**
     * @param $request
     *
     * @return Product
     */
    public static function create($request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        return $product;
    }
}
