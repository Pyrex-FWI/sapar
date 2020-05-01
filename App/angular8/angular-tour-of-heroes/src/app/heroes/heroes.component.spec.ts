import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeroesComponent } from './heroes.component';
import {FormsModule} from "@angular/forms";
import {HeroDetailComponent} from "../hero-detail/hero-detail.component";
import {RouterModule} from "@angular/router";
import {APP_BASE_HREF} from "@angular/common";
import {HttpClient, HttpClientModule} from "@angular/common/http";


describe('HeroesComponent', () => {
  let component: HeroesComponent;
  let fixture: ComponentFixture<HeroesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      imports: [
        FormsModule,
        RouterModule.forRoot([]),
        HttpClientModule,
      ],
      providers: [
        {provide: APP_BASE_HREF, useValue: '/'},
        HttpClient,
      ],
      declarations: [
        HeroesComponent,
        HeroDetailComponent,
      ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeroesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  // it(`should have as hero 'Windstorm'`, () => {
  //   const fixture = TestBed.createComponent(HeroesComponent);
  //   const app = fixture.debugElement.componentInstance;
  //   expect(app.heroes).toContain({ id: 13, name: 'Bombasto' });
  // });
});
