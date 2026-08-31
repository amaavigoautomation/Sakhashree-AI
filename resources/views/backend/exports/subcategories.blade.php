<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Subcategories Export</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Subcategories List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subcategory Name</th>
                <th>Category</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->id }}</td>
                <td>{{ $subcategory->name }}</td>
                <td>{{ $subcategory->category->name ?? '--' }}</td>
                <td>{{ $subcategory->active ? 'Active' : 'Inactive' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
