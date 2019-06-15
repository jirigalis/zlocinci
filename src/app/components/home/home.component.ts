import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

	model: any = {
		code: ""
	};

	constructor(
		private router: Router
		) { }

	ngOnInit() {
	}

	onSubmit(form) {
		let keyword = form.form.value.code;
		this.router.navigate(["search-results"], {queryParams: {query: keyword}});
	}

	showList() {
		this.router.navigate(["search-results"]);
	}

}
