import { Component } from '@angular/core';
import { AuthService } from '@auth0/auth0-angular';

@Component({
  selector: 'app-user-profile',
  template: ` <ul *ngIf="auth.user$ | async as user">
    <li>{{ user.name }}</li>
    <li>{{ user.email }}</li>
    <li>{{ user.sub }}</li>
  </ul>`,
})
export class UserProfileComponent {
  constructor(public auth: AuthService) {}
  // print user isAuthenticated status to console
  ngOnInit(): void {
    this.auth.isAuthenticated$.subscribe((data) => console.log(data));
  }
}
