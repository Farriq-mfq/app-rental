<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct(private readonly Car $car)
    {
    }
    public function index()
    {
        $cars = $this->car->paginate(10);
        return view('gallery.index', compact('cars'));
    }
}
