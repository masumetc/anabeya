<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlagController extends Controller
{
    public function flag(Request $request){
        $id = $request->id;

        //for Austria
        if ($id == '1'){
            $img = 'austria-flag-icon-16.png';
            $name = 'Austria';
        }
        //for 1
        if ($id == '2'){
            $img = 'belgium-flag-icon-16.png';
            $name = 'Belgium ';
        }
        //for 3
        if ($id == '3'){
            $img = 'bulgaria-flag-icon-16.png';
            $name = 'Bulgaria';
        }
        //for 4
        if ($id == '4'){
            $img = 'croatia-flag-icon-16.png';
            $name = 'Croatia';
        }
        //for 5
        if ($id == '5'){
            $img = 'cyprus-flag-icon-16.png';
            $name = 'Cyprus';
        }
        //for 6
        if ($id == '6'){
            $img = 'czech-republic.png';
            $name = 'Czech republic';
        }
        //for 7
        if ($id == '7'){
            $img = 'denmark-flag-icon-16.png';
            $name = 'Denmark';
        }
        //for 8
        if ($id == '8'){
            $img = 'estonia-flag-icon-16.png';
            $name = 'Estonia';
        }
        //for 9
        if ($id == '9'){
            $img = 'finland-flag-icon-16.png';
            $name = 'Finland';
        }
        //for 10
        if ($id == '10'){
            $img = 'france-flag-icon-16.png';
            $name = 'France';
        }

        // 10 complete----------------------------------------------------------------
        //for 11
        if ($id == '11'){
            $img = 'germany-flag-icon-16.png';
            $name = 'Germany';
        }
        //for 12
        if ($id == '12'){
            $img = 'greece-flag-icon-16.png';
            $name = 'Greece';
        }
        //for 13
        if ($id == '13'){
            $img = 'hungary-flag-icon-16.png';
            $name = 'Hungary';
        }
        //for 14
        if ($id == '14'){
            $img = 'ireland-flag-icon-16.png';
            $name = 'Ireland';
        }
        //for 15
        if ($id == '15'){
            $img = 'italy-flag-icon-16.png';
            $name = 'Italy';
        }
        //for 16
        if ($id == '16'){
            $img = 'latvia-flag-icon-16.png';
            $name = 'Latvia';
        }
        //for 17
        if ($id == '17'){
            $img = 'lithuania-flag-icon-16.png';
            $name = 'Lithuania';
        }
        //for 18
        if ($id == '18'){
            $img = 'luxembourg-flag-icon-16.png';
            $name = 'Luxembourg';
        }
        //for 18
        if ($id == '19'){
            $img = 'malta-flag-icon-16.png';
            $name = 'Malta';
        }
        //for 18
        if ($id == '20'){
            $img = 'netherlands-flag-icon-16.png';
            $name = 'Netherlands';
        }

        // 20 complete----------------------------------------------------------------
        //for 21
        if ($id == '21'){
            $img = 'poland-flag-icon-16.png';
            $name = 'Poland';
        }
        //for 22
        if ($id == '22'){
            $img = 'portugal-flag-icon-16.png';
            $name = 'Portugal';
        }
        //for 23
        if ($id == '23'){
            $img = 'romania-flag-icon-16.png';
            $name = 'Romania';
        }
        //for 24
        if ($id == '24'){
            $img = 'slovenia-flag-icon-16.png';
            $name = 'Slovenia';
        }
        //for 25
        if ($id == '25'){
            $img = 'spain-flag-icon-16.png';
            $name = 'Spain';
        }
        //for 26
        if ($id == '26'){
            $img = 'sweden-flag-icon-16.png';
            $name = 'Sweden';
        }
        //for 27
        if ($id == '27'){
            $img = 'united-kingdom-flag-icon-16.png';
            $name = 'United Kingdom';
        }
        //for 28
        if ($id == '28'){
            $img = 'albania-flag-icon-32.png';
            $name = 'Albania';
        }
        //for 29
        if ($id == '29'){
            $img = 'andorra-flag-icon-16.png';
            $name = 'Andorra';
        }
        //for 30
        if ($id == '30'){
            $img = 'bosnia-and-herzegovina-flag-icon-16.png';
            $name = 'Bosnia';
        }


        // 30 complete----------------------------------------------------------------
        //for 31
        if ($id == '31'){
            $img = 'iceland-flag-icon-16.png';
            $name = 'Iceland';
        }
        //for 32
        if ($id == '32'){
            $img = 'kosovo-flag-icon-16.png';
            $name = 'Kosovo';
        }
        //for 33
        if ($id == '33'){
            $img = 'liechtenstein-flag-icon-16.png';
            $name = 'Liechtenstein';
        }
        //for 34
        if ($id == '34'){
            $img = 'macedonia-flag-icon-16.png';
            $name = 'Macedonia';
        }
        //for 35
        if ($id == '35'){
            $img = 'moldova-flag-icon-16.png';
            $name = 'Moldova';
        }
        //for 36
        if ($id == '36'){
            $img = 'monaco-flag-icon-16.png';
            $name = 'Monaco';
        }
        //for 37
        if ($id == '37'){
            $img = 'montenegro-flag-icon-16.png';
            $name = 'Montenegro';
        }
        //for 38
        if ($id == '38'){
            $img = 'norway-flag-icon-16.png';
            $name = 'Norway';
        }
        //for 39
        if ($id == '39'){
            $img = 'russia-flag-icon-16.png';
            $name = 'Russia';
        }
        //for 40
        if ($id == '40'){
            $img = 'san-marino-flag-icon-32.png';
            $name = 'San Marino';
        }

        // 40 complete----------------------------------------------------------------
        //for 41
        if ($id == '41'){
            $img = 'serbia-flag-icon-16.png';
            $name = 'Serbia';
        }
        //for 42
        if ($id == '42'){
            $img = 'slovakia-flag-icon-16.png';
            $name = 'Slovakia';
        }
        //for 43
        if ($id == '43'){
            $img = 'switzerland-flag-icon-16.png';
            $name = 'Switzerland';
        }
        //for 44
        if ($id == '44'){
            $img = 'turkey-flag-icon-16.png';
            $name = 'Turkey';
        }
        //for 45
        if ($id == '45'){
            $img = 'ukraine-flag-icon-16.png';
            $name = 'Ukrain';
        }
        //for 45
        if ($id == '46'){
            $img = 'vatican-city-flag-icon-16.png';
            $name = 'Vatican City';
        }

        return view('Frontend.flag.flag', compact('id', 'img', 'name'));
    }
}
