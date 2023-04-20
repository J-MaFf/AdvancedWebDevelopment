import { Component } from '@angular/core';

@Component({
  selector: 'app-courses',
  templateUrl: './courses.component.html',
  styleUrls: ['./courses.component.css'],
})
export class CoursesComponent {
  course = {
    id: 1,
    subject: 'COMPSCI',
    number: '482',
    title: 'Advanced Web Application Development',
    credits: 3,
  };
}
