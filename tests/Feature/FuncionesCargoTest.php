<?php
use App\Models\FuncionesCargo;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede ver una funcion', function () {
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);
    

    $funciones_cargo = FuncionesCargo::factory()->make()->toArray();
    $respuesta = $this->getJson('/api/funcionesCargo');
    $respuesta->assertStatus(200);
});
test('puede crear una funcion',function(){
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $datos = [
        'descripcion_funcion'=>'es un developer',  
        'estado'=>'activo',
    ];
    $respuesta = $this->postJson('/api/funcionesCargo',$datos);
    $respuesta->assertStatus(201);
    $this->assertDatabaseHas('funciones_cargos',$datos);
});
test('puede actualizar una funcion', function(){
    $usuario = User::factory()->create();
    Sanctum::actingAs($usuario);

    $funcion = FuncionesCargo::factory()->create();
    $nuevosDatos = [
        'descripcion_funcion'=>'es un developer senior',  
        'estado'=>'inactivo',
    ];
    $respuesta = $this->putJson("/api/funcionesCargo/{$funcion->id}", $nuevosDatos);
    $respuesta->assertStatus(200);
    $this->assertDatabaseHas('funciones_cargos',$nuevosDatos);
});

test('puede eliminar una funcion',function(){
    $usuario=User::factory()->create();
    Sanctum::actingAs($usuario);

    $funcion=FuncionesCargo::factory()->create();
    $respuesta=$this->deleteJson("/api/funcionesCargo/{$funcion->id}");

    $respuesta->assertStatus(200);
    $this->assertDatabaseMissing('funciones_cargos', ['id' => $funcion->id]);
});
