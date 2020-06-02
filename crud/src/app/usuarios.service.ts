import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  URL = "http://localhost/api/";

  constructor(private http: HttpClient) { }

  obtenerUsuarios() {
    return this.http.get(`${this.URL}selectUsers.php`);
  }

  altaUsuario(usuario) {
    return this.http.post(`${this.URL}create.php`, JSON.stringify(usuario));
  }

  bajaUsuario(_id: number) {
    return this.http.get(`${this.URL}delete.php?_id=${_id}`);
  }

  seleccionarUsuario(_id: number) {
    return this.http.get(`${this.URL}selectUser.php?_id=${_id}`);
  }

  editarUsuario(usuario) {
    return this.http.post(`${this.URL}update.php`, JSON.stringify(usuario));
  }
}
