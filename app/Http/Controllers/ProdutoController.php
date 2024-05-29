<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|image'
        ]);

        $path = $request->file('imagem')->store('imagens', 'public');

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'imagem' => $path,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'image'
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            Storage::disk('public')->delete($produto->imagem);
            $produto->imagem = $path;
        }

        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        Storage::disk('public')->delete($produto->imagem);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
