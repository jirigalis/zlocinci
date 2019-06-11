import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { SearchResultsComponent } from './components/search-results/search-results.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { CardDetailComponent } from './components/card-detail/card-detail.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    SearchResultsComponent,
    NavbarComponent,
    CardDetailComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    HttpClientModule,
    FontAwesomeModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
