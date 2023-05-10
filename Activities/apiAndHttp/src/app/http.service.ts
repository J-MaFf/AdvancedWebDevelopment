import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class HttpService {
  constructor(private http: HttpClient) {
    var apiUrl: string = 'http://localhost:8000/api';
  }

  getCourseList() {
    var url: string = this.apiUrl + '/course-list/';
  }
}
