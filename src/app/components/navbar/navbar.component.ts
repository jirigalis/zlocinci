import { Component, OnInit } from '@angular/core';

import { faHome } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {
	navbarOpen = false;
	faHome = faHome;

	constructor() { }

	ngOnInit() {
	}

	toggleNavbar() {
		this.navbarOpen = !this.navbarOpen;
	}

}
