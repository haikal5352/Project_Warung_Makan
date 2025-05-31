<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Public menu listing
    public function publicIndex()
    {
        $menus = Menu::where('is_available', true)->get();
        return view('menu.index', compact('menus'));
    }

    // Admin menu listing
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'is_available' => 'required|boolean',
            'image'        => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'is_available' => 'required|boolean',
            'image'        => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    }
}

