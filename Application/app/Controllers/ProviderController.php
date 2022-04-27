<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProviderController extends BaseController
{
    public function index()
    {
        // default model
        $provider = model(Provider::class);
        // default array for view variables
        $data['title'] = 'Providers';
        $data['content'] = 'pages/providers/index';
        $data['attachments']['alerts'] = [];
        $data['attachments']['providers'] = [];
        // filters
        $name = $this->request->getGet('name'); 

        if ($this->request->getGet('admin') !== null) {
            $data['attachments']['admin'] = '';
            if ($this->request->getMethod() === 'post' && $this->validate([ // method is POST
                'name' => 'required',
                'contact' => 'required',
            ])) {
                try
                {
                    $provider->save([
                        'name' => $this->request->getPost('name'),
                        'contact' => $this->request->getPost('contact'),
                    ]);
                    $data['attachments']['providers'] = $provider->getAll();
                    array_push($data['attachments']['alerts'], [ 'type' => 'success', 'message' => 'Provider registered succesfully.' ]);
                } catch (\Error $e) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'danger', 'message' => 'Provider might not be saved, an error has ocurred.' ]);
                } catch (\Exception $e) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'warning', 'message' => 'Provider might not be saved, an exception has ocurred.' ]);
                }
                return view('main', $data);
            } else { // method is GET
                $data['attachments']['providers'] = $provider->getAll();
                if ($data['attachments']['providers'] === null || $data['attachments']['providers'] === []) {
                    array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no providers to show.' ]);
                }
                return view('main', $data);
            }
        } else { // client must not see this
            return view('errors/html/error_404');
        }
    }
}
