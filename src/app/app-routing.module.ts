import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './components/home/home.component';
import { SearchResultsComponent } from './components/search-results/search-results.component';
import { CardDetailComponent } from './components/card-detail/card-detail.component';

const routes: Routes = [
	{
		path: 'search-results',
		component: SearchResultsComponent
	},
	{
		path: 'detail/:id',
		component: CardDetailComponent
	},
	{
		path: '',
		component: HomeComponent,
		pathMatch: 'full'
	}
];

@NgModule({
	imports: [RouterModule.forRoot(routes)],
	exports: [RouterModule]
})
export class AppRoutingModule { }
