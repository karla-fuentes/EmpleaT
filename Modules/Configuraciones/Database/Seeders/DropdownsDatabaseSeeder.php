<?php

namespace Modules\Configuraciones\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Configuraciones\Entities\Dropdown;

class DropdownsDatabaseSeeder extends Seeder
{
    private $guatemala = [
        'Guatemala' =>
        [
            'Ciudad de Guatemala',
            'Amatitlán',
            'Chinautla',
            'Chuarrancho',
            'Fraijanes',
            'Mixco',
            'Palencia',
            'San José del Golfo',
            'San José Pinula',
            'San Juan Sacatepéquez',
            'San Miguel Petapa',
            'San Pedro Ayampuc',
            'San Pedro Sacatepéquez',
            'San Raymundo',
            'Santa Catarina Pinula',
            'Villa Canales',
            'Villa Nueva',
        ],
        'Alta Verapaz' =>
        [
            'Chahal',
            'Chisec',
            'Cobán',
            'Fray Bartolomé de las Casas',
            'Lanquín',
            'Panzós',
            'Raxruha',
            'San Cristóbal Verapaz',
            'San Juan Chamelco',
            'San Pedro Carchá',
            'Santa Cruz Verapaz',
            'Santa María Cahabón',
            'Senahú',
            'Tactic',
            'Tamahú',
            'Tucurú',
            'Santa Catarina La Tinta',
        ],
        'Baja Verapaz' =>
        [
            'Cubulco',
            'Granados',
            'Purulhá',
            'Rabinal',
            'Salamá',
            'San Jerónimo',
            'San Miguel Chicaj',
            'Santa Cruz El Chol',
        ],
        'Chimaltenango' =>
        [
            'Acatenango',
            'Chimaltenango',
            'El Tejar',
            'Parramos',
            'Patzicía',
            'Patzún',
            'Pochuta',
            'San Andrés Itzapa',
            'San José Poaquil',
            'San Juan Comalapa',
            'San Martín Jilotepeque',
            'Santa Apolonia',
            'Santa Cruz Balanyá',
            'Tecpán Guatemala',
            'Yepocapa',
            'Zaragoza',
        ],
        'Chiquimula' =>
        [
            'Camotán',
            'Chiquimula',
            'Concepción Las Minas',
            'Esquipulas',
            'Ipala',
            'Jocotán',
            'Olopa',
            'Quezaltepeque',
            'San Jacinto',
            'San José La Arada',
            'San Juan Ermita',
        ],
        'El Progreso' =>
        [
            'El Jícaro',
            'Guastatoya',
            'Morazán',
            'San Agustín Acasaguastlán',
            'San Antonio La Paz',
            'San Cristóbal Acasaguastlán',
            'Sanarate',
            'Sansare',
        ],
        'Escuintla' =>
        [
            'Escuintla',
            'Guanagazapa',
            'Iztapa',
            'La Democracia',
            'La Gomera',
            'Masagua',
            'Nueva Concepción',
            'Palín',
            'San José',
            'San Vicente Pacaya',
            'Santa Lucía Cotzumalguapa',
            'Sipacate',
            'Siquinalá',
            'Tiquisate',
        ],
        'Huehuetenango' =>
        [
            'Aguacatán',
            'Chiantla',
            'Colotenango',
            'Concepción Huista',
            'Cuilco',
            'Huehuetenango',
            'Jacaltenango',
            'La Democracia',
            'La Libertad',
            'Malacatancito',
            'Nentón',
            'Petatán',
            'San Antonio Huista',
            'San Gaspar Ixchil',
            'San Ildefonso Ixtahuacán',
            'San Juan Atitán',
            'San Juan Ixcoy',
            'San Mateo Ixtatán',
            'San Miguel Acatán',
            'San Pedro Necta',
            'San Pedro Soloma',
            'San Rafael La Independencia',
            'San Rafael Petzal',
            'San Sebastián Coatán',
            'San Sebastián Huehuetenango',
            'Santa Ana Huista',
            'Santa Bárbara',
            'Santa Cruz Barillas',
            'Santa Eulalia',
            'Santiago Chimaltenango',
            'Tectitán',
            'Todos Santos Cuchumatan',
            'Unión Cantinil',
        ],
        'Izabal' =>
        [
            'El Estor',
            'Livingston',
            'Los Amates',
            'Morales',
            'Puerto Barrios',
        ],
        'Jalapa' =>
        [
            'Jalapa',
            'Mataquescuintla',
            'Monjas',
            'San Carlos Alzatate',
            'San Luis Jilotepeque',
            'San Manuel Chaparrón',
            'San Pedro Pinula',
        ],
        'Jutiapa' =>
        [
            'Agua Blanca',
            'Asunción Mita',
            'Atescatempa',
            'Comapa',
            'Conguaco',
            'El Adelanto',
            'El Progreso',
            'Jalpatagua',
            'Jerez',
            'Jutiapa',
            'Moyuta',
            'Pasaco',
            'Quezada',
            'San José Acatempa',
            'Santa Catarina Mita',
            'Yupiltepeque',
            'Zapotitlán',
        ],
        'Petén' =>
        [
            'Dolores',
            'El Chal',
            'Flores',
            'La Libertad',
            'Las Cruces',
            'Melchor de Mencos',
            'Poptún',
            'San Andrés',
            'San Benito',
            'San Francisco',
            'San José',
            'San Luis',
            'Santa Ana',
            'Sayaxché',
        ],
        'Quetzaltenango' =>
        [
            'Almolonga',
            'Cabricán',
            'Cajolá',
            'Cantel',
            'Coatepeque',
            'Colomba Costa Cuca',
            'Concepción Chiquirichapa',
            'El Palmar',
            'Flores Costa Cuca',
            'Génova',
            'Huitán',
            'La Esperanza',
            'Olintepeque',
            'Ostuncalco',
            'Palestina de Los Altos',
            'Quetzaltenango',
            'Salcajá',
            'San Carlos Sija',
            'San Francisco La Unión',
            'San Juan Ostuncalco',
            'San Martín Sacatepéquez',
            'San Mateo',
            'San Miguel Sigüilá',
            'Sibilia',
            'Zunil',
        ],
        'Quiché' =>
        [
            'Canillá',
            'Chajul',
            'Chicamán',
            'Chiché',
            'Santo Tomás Chichicastenango',
            'Chinique',
            'Cunén',
            'Ixcán',
            'Joyabaj',
            'Nebaj',
            'Pachalum',
            'Patzité',
            'Sacapulas',
            'San Andrés Sajcabajá',
            'San Antonio Ilotenango',
            'San Bartolomé Jocotenango',
            'San Juan Cotzal',
            'San Pedro Jocopilas',
            'Santa Cruz del Quiché',
            'Uspantán',
            'Zacualpa',
        ],
        'Retalhuleu' =>
        [
            'Champerico',
            'El Asintal',
            'Nuevo San Carlos',
            'Retalhuleu',
            'San Andrés Villa Seca',
            'San Felipe',
            'San Martín Zapotitlán',
            'San Sebastián',
            'Santa Cruz Muluá',
        ],
        'Sacatepéquez' =>
        [
            'Alotenango',
            'Antigua Guatemala',
            'Ciudad Vieja',
            'Jocotenango',
            'Magdalena Milpas Altas',
            'Pastores',
            'San Antonio Aguas Calientes',
            'San Bartolomé Milpas Altas',
            'San Lucas Sacatepéquez',
            'San Miguel Dueñas',
            'Santa Catarina Barahona',
            'Santa Lucía Milpas Altas',
            'Santa María de Jesús',
            'Santiago Sacatepéquez',
            'Santo Domingo Xenacoj',
            'Sumpango',
        ],
        'San Marcos' =>
        [
            'Ayutla',
            'Catarina',
            'Comitancillo',
            'Concepción Tutuapa',
            'El Quetzal',
            'El Rodeo',
            'El Tumbador',
            'Esquipulas Palo Gordo',
            'Ixchiguán',
            'La Blanca',
            'La Reforma',
            'Malacatán',
            'Nuevo Progreso',
            'Ocos',
            'Pajapita',
            'Río Blanco',
            'San Antonio Sacatepéquez',
            'San Cristóbal Cucho',
            'San José El Rodeo',
            'San José Ojetenam',
            'San Lorenzo',
            'San Marcos',
            'San Miguel Ixtahuacán',
            'San Pablo',
            'San Pedro Sacatepéquez',
            'San Rafael Pie de La Cuesta',
            'Sibinal',
            'Sipacapa',
            'Tacaná',
            'Tajumulco',
            'Tejutla',
        ],
        'Santa Rosa' =>
        [
            'Barberena',
            'Casillas',
            'Chiquimulilla',
            'Cuilapa',
            'Guazacapán',
            'Nueva Santa Rosa',
            'Oratorio',
            'Pueblo Nuevo Viñas',
            'San Juan Tecuaco',
            'San Rafael Las Flores',
            'Santa Cruz Naranjo',
            'Santa María Ixhuatán',
            'Santa Rosa de Lima',
            'Taxisco',
        ],
        'Sololá' =>
        [
            'Concepción',
            'Nahualá',
            'Panajachel',
            'San Andrés Semetabaj',
            'San Antonio Palopó',
            'San José Chacaya',
            'San Juan La Laguna',
            'San Lucas Tolimán',
            'San Marcos La Laguna',
            'San Pablo La Laguna',
            'San Pedro La Laguna',
            'Santa Catarina Ixtahuacan',
            'Santa Catarina Palopó',
            'Santa Clara La Laguna',
            'Santa Cruz La Laguna',
            'Santa Lucía Utatlán',
            'Santa María Visitación',
            'Santiago Atitlán',
            'Sololá',
        ],
        'Suchitepéquez' =>
        [
            'Chicacao',
            'Cuyotenango',
            'Mazatenango',
            'Patulul',
            'Pueblo Nuevo',
            'Río Bravo',
            'Samayac',
            'San Antonio Suchitepéquez',
            'San Bernardino',
            'San Francisco Zapotitlán',
            'San Gabriel',
            'San José El Idolo',
            'San José La Máquina',
            'San Juan Bautista',
            'San Lorenzo',
            'San Miguel Panán',
            'San Pablo Jocopilas',
            'Santa Bárbara',
            'Santo Domingo Suchitepéquez',
            'Santo Tomas La Unión',
            'Zunilito',
        ],
        'Totonicapán' =>
        [
            'Momostenango',
            'San Andrés Xecul',
            'San Bartolo',
            'San Cristóbal Totonicapán',
            'San Francisco El Alto',
            'Santa Lucía La Reforma',
            'Santa María Chiquimula',
            'Totonicapán',
        ],
        'Zacapa' =>
        [
            'Cabañas',
            'Estanzuela',
            'Gualán',
            'Huité',
            'La Unión',
            'Río Hondo',
            'San Diego',
            'San Jorge',
            'Teculután',
            'Usumatlán',
            'Zacapa',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $parent = Dropdown::create(
            [
                'value' => 'Ubicaciones',
                'description' => 'Dropdowns de Ubicaciones',
            ]
        );
        $guatemala = Dropdown::create([
            'value' => 'Guatemala',
            'parent_id' => $parent->id
        ]);
        foreach ($this->guatemala as $departamento => $municipios) {

            $departamentoNuevo = Dropdown::create([
                'value' => $departamento,
                'parent_id' => $guatemala->id
            ]);

            foreach ($municipios as $municipio) {
                Dropdown::create([
                    'parent_id' => $departamentoNuevo->id,
                    'value' => $municipio
                ]);
            }
        }

        $genero = Dropdown::create(
            [
                'value' => 'Genero',
                'description' => 'Dropdowns de Genero',
            ]
        );
        Dropdown::create(
            [
                'value' => 'Masculino',
                'key' => 'M',
                'parent_id' => $genero->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'Femenino',
                'key' => 'F',
                'parent_id' => $genero->id
            ]
        );

        $estado_civil = Dropdown::create(
            [
                'value' => 'Estado Civil',
                'description' => 'Dropdowns de Estado Civil',
            ]
        );
        Dropdown::create(
            [
                'value' => 'Soltero',
                'parent_id' => $estado_civil->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'Casado',
                'parent_id' => $estado_civil->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'Unido',
                'parent_id' => $estado_civil->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'Viudo',
                'parent_id' => $estado_civil->id
            ]
        );


        $si_no = Dropdown::create(
            [
                'value' => 'Si/No',
                'description' => 'Dropdowns de Si/No',
            ]
        );
        Dropdown::create(
            [
                'value' => 'Si',
                'key' => '1',
                'parent_id' => $si_no->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'No',
                'key' => '0',
                'parent_id' => $si_no->id
            ]
        );

        $habilitado = Dropdown::create(
            [
                'value' => 'Habilitado/Deshabilitado',
                'description' => 'Dropdowns de Habilitado/Deshabilitado',
            ]
        );
        Dropdown::create(
            [
                'value' => 'Habilitado',
                'key' => '1',
                'parent_id' => $habilitado->id
            ]
        );
        Dropdown::create(
            [
                'value' => 'Deshabilitado',
                'key' => '0',
                'parent_id' => $habilitado->id
            ]
        );

    }
}
