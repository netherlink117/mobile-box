<?php

namespace App\Controllers;

use App\Models\Phone;
use App\Controllers\BaseController;

class PhoneController extends BaseController
{
    public function index()
    {
        // default model
        $phone = model(Phone::class);
        // default array for view variables
        $data['title'] = 'Phones';
        $data['content'] = 'pages/phones/index';
        $data['attachments']['alerts'] = [];
        $data['attachments']['phones'] = [];
        // filters
        $brand = $this->request->getGet('brand'); 
        $cores = $this->request->getGet('cores') ? explode(",", $this->request->getGet('cores')) : [ null, null ];
        $ram = $this->request->getGet('ram') ? explode(",", $this->request->getGet('ram')) : [ null, null ];
        $battery = $this->request->getGet('battery') ? explode(",", $this->request->getGet('battery')) : [ null, null ];
        $price = $this->request->getGet('price') ? explode(",", $this->request->getGet('price')) : [ null, null ];

        if ($this->request->getGet('admin') !== null) {
            $data['attachments']['admin'] = '';
            if ($this->request->getMethod() === 'post' && $this->validate([ // method is POST
                'brand' => 'required',
                'model' => 'required',
                'description' => 'required',
                'cores' => 'required',
                'ram' => 'required',
                'battery' => 'required',
                'price' => 'required',
            ])) {
                try
                {
                    $phone->save([
                        'brand' => $this->request->getPost('brand'),
                        'model' => $this->request->getPost('model'),
                        'description' => $this->request->getPost('description'),
                        'cores' => $this->request->getPost('cores'),
                        'ram' => $this->request->getPost('ram'),
                        'battery' => $this->request->getPost('battery'),
                        'price' => $this->request->getPost('price'),
                        'stock' => 0,
                    ]);
                    $data['attachments']['phones'] = $phone->getAll();
                    array_push($data['attachments']['alerts'], [ 'type' => 'success', 'message' => 'Phone registered succesfully.' ]);
                } catch (\Error $e) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'danger', 'message' => 'Phone might not be saved, an error has ocurred.' ]);
                } catch (\Exception $e) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'warning', 'message' => 'Phone might not be saved, an exception has ocurred.' ]);
                }
                return view('main', $data);
            } else { // method is GET
                $data['attachments']['phones'] = $phone->getAll(
                    null,
                    $brand,
                    $cores[1],
                    $cores[0],
                    $ram[1],
                    $ram[0],
                    $battery[1],
                    $battery[0],
                    $price[1],
                    $price[0]
                );
                if ($data['attachments']['phones'] === null || $data['attachments']['phones'] === []) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no phones to show.' ]);
                }
                return view('main', $data);
            }
        } else { // method is always GET for non admin
            $data['attachments']['phones'] = $phone->getAll(
                null,
                $brand,
                $cores[1],
                $cores[0],
                $ram[1],
                $ram[0],
                $battery[1],
                $battery[0],
                $price[1],
                $price[0]
            );
            if ($data['attachments']['phones'] === null || $data['attachments']['phones'] === []) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no phones to show.' ]);
            }
            return view('main', $data);
        }
    }

    public function view($id)
    {
        $phone = model(Phone::class);
        $data['title'] = 'Phones';
        $data['content'] = 'pages/phones/view';
        $data['attachments']['alerts'] = [];
        $data['attachments']['phone'] = [];
        $data['attachments']['providers'] = [];
        if ($this->request->getGet('admin') !== null) {
            $data['attachments']['admin'] = '';
            $data['attachments']['phone'] = $phone->getOne($id);
            $data['title'] = $data['attachments']['phone']['brand'] . " " . $data['attachments']['phone']['model'];
            $provider = model(Provider::class);
            $data['attachments']['providers'] = $provider->getAll($id);
            $data['attachments']['providers_unreferenced'] = $provider->getAll();
            if ($data['attachments']['providers'] === null || $data['attachments']['providers'] === []) {
                array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no providers for this phone.' ]);
            }
            return view('main', $data);
        } else {
            $data['attachments']['phone'] = $phone->getOne($id);
            $data['title'] = $data['attachments']['phone']['brand'] . " " . $data['attachments']['phone']['model'];
            return view('main', $data);
        }
    }

    public function reference($id) {
        $phone = model(Phone::class);
        $data['title'] = 'Phones';
        $data['content'] = 'pages/phones/view';
        $data['attachments']['alerts'] = [];
        $data['attachments']['phone'] = [];
        $data['attachments']['providers'] = [];
        if ($this->request->getGet('admin') !== null) {
            $data['attachments']['admin'] = '';
            $data['attachments']['phone'] = $phone->getOne($id);
            $data['title'] = $data['attachments']['phone']['brand'] . " " . $data['attachments']['phone']['model'];
            $provider = model(Provider::class);
            $data['attachments']['providers'] = $provider->getAll($id);
            $data['attachments']['providers_unreferenced'] = $provider->getAll();
            $phone->reference($id, $this->request->getPost('provider'), $this->request->getPost('price'));
            if ($data['attachments']['providers'] === null || $data['attachments']['providers'] === []) {
                array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no providers for this phone.' ]);
            }
            return view('main', $data);
        } else {
            return view('errors/html/error_404');
        }
    }
}
