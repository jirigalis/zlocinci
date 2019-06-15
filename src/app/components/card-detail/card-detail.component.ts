import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from  '@angular/router';
import { Lightbox } from 'ngx-lightbox';

import { OutlawService } from '../../services/outlaw.service';

@Component({
  selector: 'app-card-detail',
  templateUrl: './card-detail.component.html',
  styleUrls: ['./card-detail.component.scss']
})
export class CardDetailComponent implements OnInit {

	public card: any = { img: ''};
	private album = [];

	constructor(
		private route: ActivatedRoute,
		private outlawService: OutlawService,
		private lightbox: Lightbox
		) {}

	ngOnInit() {
		const cardId = +this.route.snapshot.paramMap.get('id');
		this.outlawService.getCardById(cardId)
			.subscribe(res => {
				this.card = res;
				this.card.img = 'assets/outlaws/'+this.card.img		
			})
	}

	displayPhoto(src) {
		let img = [];
		img.push({src: src});
		this.lightbox.open(img);
	}

	close() {
		this.lightbox.close();
	}

}
