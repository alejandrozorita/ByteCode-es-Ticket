<?php

use Faker\Generator;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;


abstract class BaseSeeder extends Seeder {


	protected static $pool =  array();

	protected $total = 50;



	public function run()
	{
		$this->crearMultiples($this->total);
	}

	protected function crearMultiples($num, array $valoresPersonalizados = array())
	{

		for ($i=1; $i < $num; $i++) { 

			$this->crear($valoresPersonalizados);

		}

	}

	abstract public function getModel();

	abstract public function getDummyData(Generator $faker, array $valoresPersonalizados = array());

	/**
	 * 
	 */
	protected function crear(array $valoresPersonalizados = array())
	{

		//Creamos los valores con la personalización$valoresPersonalizados
		$valores = $this->getDummyData(Faker::create(), $valoresPersonalizados);

		//Sustituimos los valores generados con el faker por los valores personalizados en caso de ser necesario
		$valores = array_merge($valores, $valoresPersonalizados);

		$this->addToPool($this->getModel()->create($valores));

	}


	public function getRandom($modelo)
	{

		if ( ! $this->collectionExists($modelo))
		{
			throw new Exception("El $modelo collection no existe");
		}

		return static::$pool[$modelo]->random();
	}


	private function addToPool($entidad)
	{

		//Sacamos la clase del usuario
		$reflection = new ReflectionClass($entidad);
		$class = $reflection->getShortName();


		if (!$this->collectionExists($class))
		{
			static::$pool[$class] = new Collection();
		}

		static::$pool[$class]->add($entidad);

		return $entidad;
	}

	/**
	 * @param $class
	 * @return bool
	 */
	private function collectionExists($class)
	{
		return isset(static::$pool[$class]);
	}


	/**
	 * 
	 */
	

}