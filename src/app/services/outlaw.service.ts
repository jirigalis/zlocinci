import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';
import { of } from 'rxjs/observable/of';
import { catchError, map, tap } from 'rxjs/operators';

const httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json'})
};

@Injectable({
  providedIn: 'root'
})
export class OutlawService {

  constructor(private http: HttpClient) { }

  private url = 'http://localhost/zlocinci-api';

  search(keyword: String) {
  	if(!keyword.trim()) {
  		return of([]);
  	}
  	let url = `${this.url}/search?term=${keyword}`;
  	return this.http.get(url);
  }

}