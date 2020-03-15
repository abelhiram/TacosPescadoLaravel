<?php

namespace App\Events;

use App\mdlOrdenes;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class formSubmit implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $id,$comida,$cantidad,$sugerencias,$subtotal;

  public function __construct($comida,$cantidad,$sugerencias,$subtotal,$img)
  {
    if(1==2){
      $mdlOrdenes = mdlOrdenes::where('id', '=', $sugerencias)->get(); 
      $mdlOrdenes->estado = 2;
      $mdlOrdenes->save();
      $this->id = 15030220029;
      $this->comida = $comida;
      $this->cantidad = $cantidad;
      $this->sugerencias = $sugerencias;
      $this->subtotal = $subtotal;
      $this->img = $img;
    }else{
      $mdlOrdenes = new mdlOrdenes();
      $mdlOrdenes->comida = $comida;
      $mdlOrdenes->cantidad = $cantidad;
      $mdlOrdenes->sugerencias = $sugerencias;
      $mdlOrdenes->subtotal = $subtotal;
      $mdlOrdenes->img = $img;
      $mdlOrdenes->save();

      $u = mdlOrdenes::get()->last();

      $this->id = $u->id;
      $this->comida = $u->comida;
      $this->cantidad = $u->cantidad;
      $this->sugerencias = $u->sugerencias;
      $this->subtotal = $u->subtotal;
      $this->img = $u->img;
    }
  }

  public static function ul(){
    $u = mdlOrdenes::orderBy('id','ASC')->get()->last();
    return $u;
  }

  public function broadcastOn()
  {
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }
}