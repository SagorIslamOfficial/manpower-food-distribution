<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Shift;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $days = Day::all();

        $selectedDay = $request->get('day');

        $snackQuantities = [];
        $lunchQuantities = [];
        $manpower = [];

        if ($selectedDay) {
            $selectedDayModel = Day::where('name', $selectedDay)->first();

            if ($selectedDayModel) {
                // Fetch total persons for each shift
                $generalShift = Shift::where('name', 'Shift General')->first();
                $shiftA = Shift::where('name', 'Shift - A')->first();
                $shiftB = Shift::where('name', 'Shift - B')->first();
                $shiftC = Shift::where('name', 'Shift - C')->first();

                $totalPersonsMorning = $generalShift->manpower_count + $shiftA->manpower_count;
                $totalPersonsAfternoon = $shiftB->manpower_count + $shiftC->manpower_count;
                $totalPersonsLunch = $generalShift->manpower_count + $shiftA->manpower_count + $shiftB->manpower_count;

                // Fetch snacks and lunch items for the selected day
                $snackItems = MenuItem::with('item', 'time')
                    ->where('menu_id', Menu::where('name', 'Snacks')->first()->id)
                    ->where('day_id', $selectedDayModel->id)
                    ->get();

                $lunchItems = MenuItem::with('item')
                    ->where('menu_id', Menu::where('name', 'Lunch')->first()->id)
                    ->where('day_id', $selectedDayModel->id)
                    ->get();

                foreach ($snackItems as $menuItem) {
                    if ($menuItem->time->name == 'Morning') {
                        $totalQuantity = $menuItem->item->quantity_per_person * $totalPersonsMorning;
                    } else {
                        $totalQuantity = $menuItem->item->quantity_per_person * $totalPersonsAfternoon;
                    }
                    $snackQuantities[] = [
                        'item' => $menuItem->item->name,
                        'time' => $menuItem->time->name,
                        'quantity' => $totalQuantity . ' pcs',
                    ];
                }

                foreach ($lunchItems as $menuItem) {
                    $quantityInGrams = $menuItem->item->quantity_per_person * $totalPersonsLunch;
                    $quantityInKg = $quantityInGrams / 1000;
                    $quantityInKg = number_format($quantityInKg, 1);

                    $lunchQuantities[] = [
                        'item' => $menuItem->item->name,
                        'quantity' => $quantityInKg . ' kg',
                    ];
                }

                $manpower = [
                    'Snacks - Morning' => $totalPersonsMorning,
                    'Snacks - Afternoon' => $totalPersonsAfternoon,
                    'Lunch' => $totalPersonsLunch,
                ];
            }
        }

        return view('backend.reports.index', [
            'days' => $days,
            'selectedDay' => $selectedDay,
            'snackQuantities' => $snackQuantities,
            'lunchQuantities' => $lunchQuantities,
            'manpower' => $manpower,
        ]);
    }
}
