<table>
   <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Page Title</th>
            <th>Slug</th>
            <th>URL</th>
            <th>Order</th>
            <th>Display Order</th>
            <th>Homepage Display</th>
            <th>Homepage Order</th>
            <th>No. of Elements</th>
            <th>Status</th>
            <th>Meta Description</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name ?? '--' }}</td>
            <td>{{ $category->page_title ?? '--' }}</td>
            <td>{{ $category->page_slug ?? '--' }}</td>
            <td>{{ $category->page_url ?? '--' }}</td>
            <td>{{ $category->order ?? 0 }}</td>
            <td>{{ $category->display_order ?? 0 }}</td>
            <td>{{ $category->display_on_homepage ? 'Yes' : 'No' }}</td>
            <td>{{ $category->homepage_order ?? 0 }}</td>
            <td>{{ $category->no_of_elements_to_show ?? 0 }}</td>
            <td>{{ $category->active ? 'Active' : 'Inactive' }}</td>
            <td>{{ $category->meta_description ?? '--' }}</td>
            <td>{{ $category->description ?? '--' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
