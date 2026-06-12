<?php

use App\Models\Cargo;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

test('puede ver un cargo', function () {
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $cargo = Cargo::factory()->make()->toArray();
    $respuesta = $this->getJson('/api/cargos');
    $respuesta->assertStatus(200);
});

test('puede crear un cargo por',function(){
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $datos = [
        'nombre_cargo' => 'Desarrollador Fullstack',
        'descripcion' => 'Encargado de desarrollar la logica de la aplicacion'
    ];
    $respuesta = $this->postJson('/api/cargos',$datos);
    $respuesta ->assertStatus(201);
    $this -> assertDatabaseHas('cargos', $datos);
});

test('puede actualizar un cargo',function(){
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $cargo = Cargo::factory()->create();
    $nuevosDatos= [
        'nombre_cargo' => 'Desarrollador Lead',
        'descripcion' => 'Lider tecnico del desarrollo'
    ];
    $respuesta = $this->putJson("/api/cargos/{$cargo->id}", $nuevosDatos);
    $respuesta ->assertStatus(200);
    $this->assertDatabaseHas('cargos', $nuevosDatos);
});

test('puede eliminar un cargo',function(){
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $cargo = Cargo::factory()->create();
    $respuesta = $this->deleteJson("/api/cargos/{$cargo->id}");
    
    $respuesta->assertStatus(200);
    $this->assertDatabaseMissing('cargos', ['id' => $cargo->id]);
});