import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router} from '@angular/router';

import { OutlawService } from '../../services/outlaw.service'

@Component({
	selector: 'search-results',
	templateUrl: './search-results.component.html',
	styleUrls: ['./search-results.component.scss']
})
export class SearchResultsComponent implements OnInit {
	
	private sub;
	public results;
	query;

	constructor(
		private outlawService: OutlawService,
		private route: ActivatedRoute,
		private router: Router
		) { }

	ngOnInit() {
		this.sub = this.route
			.queryParams
			.subscribe(params => {
				this.query = params.query;
				this.outlawService.search(params.query)
					.subscribe(res => {
						this.results = res;
					})
			})
	}

	ngOnDestroy() {
		this.sub.unsubscribe();
	}

	goToDetail(id) {
		this.router.navigate(["detail", {id: id}]);
	}

}
