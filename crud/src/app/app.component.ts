import { Component } from '@angular/core';
import { UsuariosService } from './usuarios.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  usuarios = null;

  usuario = {
    _id:null,
    name:null,
    email:null,
    password:null
  }
  constructor(private usuariosServicio: UsuariosService) { }

  ngOnInit() {
    this.obtenerUsuarios();
  }

  //Funcion para mostrar todos los usuarios
  obtenerUsuarios() {
    this.usuariosServicio.obtenerUsuarios().subscribe(result => this.usuarios = result); //
  }

  altaUsuario() {
    this.usuariosServicio.altaUsuario(this.usuario).subscribe(
      datos => {
        if(datos['response'] == 'OK') {
          alert(datos['mensaje']);
          this.obtenerUsuarios();
        }
      }
    );
  }

  bajaUsuario(_id) {
    this.usuariosServicio.bajaUsuario(_id).subscribe(
      datos => {
        if(datos['response'] == 'OK') {
          alert(datos['mensaje']);
          this.obtenerUsuarios();
        }
      }
    );
  }

  editarUsuario() {
    this.usuariosServicio.editarUsuario(this.usuario).subscribe(
      datos => {
        if(datos['response'] == 'OK') {
          alert(datos['mensaje']);
          this.obtenerUsuarios();
        }
      }
    );
  }

  seleccionarUsuario(_id) {
    this.usuariosServicio.seleccionarUsuario(_id).subscribe(
      result => this.usuario = result[0]
    );
  }

  hayRegistros() {
    if(this.usuarios == null) {
      return false;
    } else {
      return true;
    }
  }
}
