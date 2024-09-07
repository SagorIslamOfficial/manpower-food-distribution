<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Menu;
use App\Models\MenuItem;
class PredictionController extends Controller
{
    public function predictSnacks()
    {
        // Fetch shifts and their manpower counts
        $shifts = Shift::all();
        $totalShifts = $shifts->count();
        $totalManpower = $shifts->sum('manpower_count');
        $averageManpower = $totalManpower / $totalShifts;

        // Fetch snacks items
        $snackItems = MenuItem::with('item', 'time')
            ->where('menu_id', Menu::where('name', 'Snacks')->first()->id)
            ->get();

        $predictedQuantities = [];
        foreach ($snackItems as $menuItem) {
            $quantityPerPerson = $menuItem->item->quantity_per_person;
            $totalQuantity = $quantityPerPerson * $averageManpower;

            $predictedQuantities[] = [
                'item' => $menuItem->item->name,
                'time' => $menuItem->time->name,
                'predicted_quantity' => $totalQuantity . ' pcs',
            ];
        }

        return view('backend.prediction.snacks', [
            'predictedQuantities' => $predictedQuantities,
            'averageManpower' => $averageManpower,
        ]);
    }

    public function predictLunch()
    {
        // Fetch shifts and their manpower counts
        $shifts = Shift::all();
        $totalShifts = $shifts->count();
        $totalManpower = $shifts->sum('manpower_count');
        $averageManpower = $totalManpower / $totalShifts;

        // Fetch lunch items
        $lunchItems = MenuItem::with('item')
            ->where('menu_id', Menu::where('name', 'Lunch')->first()->id)
            ->get();

        $predictedQuantities = [];
        foreach ($lunchItems as $menuItem) {
            $quantityPerPerson = $menuItem->item->quantity_per_person;
            $totalQuantityInGrams = $quantityPerPerson * $averageManpower;
            $totalQuantityInKg = $totalQuantityInGrams / 1000;
            $totalQuantityInKg = number_format($totalQuantityInKg, 1);

            $predictedQuantities[] = [
                'item' => $menuItem->item->name,
                'predicted_quantity' => $totalQuantityInKg . ' kg',
            ];
        }

        return view('backend.prediction.lunch', [
            'predictedQuantities' => $predictedQuantities,
            'averageManpower' => $averageManpower,
        ]);
    }
}

