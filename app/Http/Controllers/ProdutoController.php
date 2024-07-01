<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|image',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $path = $request->file('imagem')->store('imagens', 'public');

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'imagem' => $path,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'image',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');

            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $validatedData['imagem'] = $path;
        }

        $produto->update($validatedData);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }


    public function destroy(Produto $produto)
    {
        Storage::disk('public')->delete($produto->imagem);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
