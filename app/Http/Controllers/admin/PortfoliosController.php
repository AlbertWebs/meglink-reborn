<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    public function home(){
        $page = 'portfolio';
        return view('pages.portfolio', compact('page'));
    }
    public function index()
    {
        $portfolios = Portfolio::with('service')->latest()->paginate(15);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.portfolios.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'images.*' => 'nullable|image|max:4096',
            'service_id' => 'nullable|exists:services,id',
            'meta' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio = Portfolio::create($data);

        // multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('portfolios/gallery', 'public');
                $portfolio->images()->create(['image_link' => $path]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success','Portfolio saved.');
    }

    public function edit(Portfolio $portfolio)
    {
        $services = Service::all();
        $portfolio->load('images');
        return view('admin.portfolios.edit', compact('portfolio','services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'images.*' => 'nullable|image|max:4096',
            'service_id' => 'nullable|exists:services,id',
            'meta' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('portfolios/gallery', 'public');
                $portfolio->images()->create(['image_link' => $path]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success','Portfolio updated.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
        // cascade will delete portfolio_images
        $portfolio->delete();
        return back()->with('success','Portfolio deleted.');
    }

    // optional: delete a single gallery image
    public function destroyImage(PortfolioImage $image)
    {
        Storage::disk('public')->delete($image->image_link);
        $image->delete();
        return back()->with('success','Image removed.');
    }
}
