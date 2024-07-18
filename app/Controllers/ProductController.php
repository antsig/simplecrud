<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();

        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $min_price = $this->request->getGet('min_price');
        $max_price = $this->request->getGet('max_price');

        $builder = $model->builder();

        if ($search) {
            $builder->like('name', $search);
        }

        if ($category) {
            $builder->where('category', $category);
        }

        if ($min_price) {
            $builder->where('price >=', $min_price);
        }

        if ($max_price) {
            $builder->where('price <=', $max_price);
        }

        $data = [
            'products' => $builder->get()->getResultArray(),
            'search' => $search,
            'category' => $category,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ];

        return view('products/index', $data);
    }


    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductModel();

        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|in_list[food,beverages,electronics,clothes,equipment]',
            'stock' => 'required|integer'
        ])) {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'stock' => $this->request->getPost('stock'),
            ];

            $model->insert($data);

            return redirect()->to('/products');
        } else {
            return view('products/create', [
                'validation' => $this->validator
            ]);
        }
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();

        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|in_list[food,beverages,electronics,clothes,equipment]',
            'stock' => 'required|integer'
        ])) {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'stock' => $this->request->getPost('stock'),
            ];

            $model->update($id, $data);

            return redirect()->to('/products');
        } else {
            return view('products/edit', [
                'product' => $model->find($id),
                'validation' => $this->validator
            ]);
        }
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/products');
    }
}
