<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController
{
    public function index()
    {
        // ดึงข้อมูลเรียงตามวันที่
        $weights = Weight::orderBy('recorded_date', 'asc')->get();
        return view('weights.index', compact('weights'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'weight' => 'required|numeric|min:1',
                'recorded_date' => 'required|date'
            ]);

            $newWeight = new \App\Models\Weight();
            $newWeight->recorded_date = $request->recorded_date;
            $newWeight->weight = $request->weight;
            $newWeight->save();

            return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ!');
        } catch (\Exception $e) {
            // บรรทัดนี้จะสกัดเอาข้อความ Error ที่แท้จริงออกมาโชว์หน้าจอครับ!
            dd($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'required|numeric|min:1',
            'recorded_date' => 'required|date'
        ]);

        $weight = Weight::findOrFail($id);
        $weight->update($request->all());
        return redirect()->back()->with('success', 'อัปเดตข้อมูลสำเร็จ!');
    }

    public function destroy($id)
    {
        Weight::destroy($id);
        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ!');
    }
}
