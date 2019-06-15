import { Component, OnInit, Input } from '@angular/core';
import { Location } from '@angular/common';

import { faHome, faArrowLeft } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {
	
	@Input() brand;
	navbarOpen = false;
	faHome = faHome;
	faArrowLeft = faArrowLeft;

	constructor(
		private location: Location
	) { }

	ngOnInit() {
	}

	toggleNavbar() {
		this.navbarOpen = !this.navbarOpen;
	}

	goBack() {
		this.location.back();
	}

}
