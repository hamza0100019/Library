<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Afficher tous les livres.
     */
    public function index()
    {
        $livres = Livre::with('categorie')->get(); // Charger les relations
        return view('admin.books.index', compact('livres'));
    }

    /**
     * Afficher le formulaire pour créer un nouveau livre.
     */
    public function create()
    {
        $categories = Categorie::all(); // Récupérer les catégories
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Stocker un nouveau livre.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'auteur' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantite' => 'required|integer|min:1',
                'date_publication' => 'required|date',
                'categorie_id' => 'nullable|exists:categories,id',
                'disponible' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('books', 'public');
                $validated['image'] = $path;
            }

            $validated['disponible'] = $request->has('disponible');

            Livre::create($validated);

            return redirect()->route('admin.books')->with('success', 'Livre ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


    /**
     * Afficher le formulaire d'édition d'un livre.
     */
    public function edit($id)
    {
        $livre = Livre::findOrFail($id);
        $categories = Categorie::all(); // Récupérer les catégories
        return view('admin.books.edit', compact('livre', 'categories'));
    }

    /**
     * Mettre à jour un livre existant.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantite' => 'required|integer|min:1',
            'date_publication' => 'required|date',
            'categorie_id' => 'nullable|exists:categories,id',
            'disponible' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $livre = Livre::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('books', 'public');
            $validated['image'] = $path;
        }

        $validated['disponible'] = $request->has('disponible'); // Par défaut true si coché

        $livre->update($validated);

        return redirect()->route('admin.books')->with('success', 'Livre mis à jour avec succès.');
    }

    /**
     * Supprimer un livre.
     */
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('admin.books')->with('success', 'Livre supprimé avec succès.');
    }

    /**
     * Afficher la vue de recherche.
     */
    public function searchView()
    {
        $categories = Categorie::all();
        return view('books.search', compact('categories'));
    }

    /**
     * Rechercher des livres avec filtres.
     */
    public function search(Request $request)
    {
        $query = Livre::query();

        // Recherche par mot-clé
        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('titre', 'like', '%' . $request->query('query') . '%')
                    ->orWhere('auteur', 'like', '%' . $request->query('query') . '%')
                    ->orWhere('description', 'like', '%' . $request->query('query') . '%');
            });
        }

        // Filtrer par catégorie
        if ($request->filled('categorie')) {
            $query->where('categorie_id', $request->categorie);
        }

        // Filtrer par année
        if ($request->filled('annee')) {
            $query->whereYear('date_publication', $request->annee);
        }

        // Filtrer par disponibilité
        if ($request->filled('disponibilite')) {
            $query->where('disponible', $request->disponibilite);
        }

        // Pagination
        $livres = $query->paginate(6);

        // Récupérer les catégories pour les filtres
        $categories = Categorie::all();

        return view('books.search', compact('livres', 'categories'));
    }

    public function apibook(Request $request){

        $query = Livre::query();
        // Recherche par mot-clé
        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('titre', 'like', '%' . $request->query('query') . '%')
                    ->orWhere('auteur', 'like', '%' . $request->query('query') . '%')
                    ->orWhere('description', 'like', '%' . $request->query('query') . '%');
            });
        }

        // Filtrer par catégorie
        if ($request->filled('categorie')) {
            $query->where('categorie_id', $request->categorie);
        }

        // Filtrer par année
        if ($request->filled('annee')) {
            $query->whereYear('date_publication', $request->annee);
        }

        // Filtrer par disponibilité
        if ($request->filled('disponibilite')) {
            $query->where('disponible', $request->disponibilite);
        }

        // Pagination
        $livres = $query->paginate(10);

        return response()->json([
            'livres' => $livres,
        ]);
    }
}
