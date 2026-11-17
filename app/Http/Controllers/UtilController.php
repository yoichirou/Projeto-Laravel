<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{





    public function loadWelcome() {
    return view('welcome');
    }

    public function loadHomepage() {

        //dados que no futuro estarão definidos no controller e vêm da base de dados
        $courseName = 'SD';

        //simulo que vou à base de dados e trago a lista de alunos
        $students = ['Licínia', 'Raquel', 'João', 'Leonel'];

        // array associativo
        // dados que serão carregados da base de dados

        $contactInfo = [
            'name' => 'Bruno',
            'contact' => 'Bruno@cesae.pt'
        ];

        // Debugs
        // dd($contactInfo);
        // var_dump($contactInfo);

        $istec_info = [
            'name'=> 'Cesae Digital',
            'address' => 'Rua Ciríaco Cardoso, 186 4150-212 Porto',
            'email' =>'porto@cesae.pt'
         ];

        return view('home', compact('courseName', 'students', 'contactInfo', 'istec_info'));
    }



}
