<?php
namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;

class CategoriesExport implements FromView
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $query = Category::query();

        if (!empty($this->request->query('id'))) {
            $query->where('id', $this->request->query('id'));
        }

        if (!empty($this->request->query('name'))) {
            $query->where('name', $this->request->query('name'));
        }

        if (!empty($this->request->query('status'))) {
            $status = $this->request->query('status') === 'active' ? 1 : 0;
            $query->where('active', $status);
        }

        $categories = $query->orderBy('id', 'asc')->get();

        return view('backend.exports.categories', [
            'categories' => $categories
        ]);
    }
}
