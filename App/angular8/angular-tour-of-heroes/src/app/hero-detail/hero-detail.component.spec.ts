import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeroDetailComponent } from './hero-detail.component';
import {FormsModule} from "@angular/forms";
import {ActivatedRoute, RouterModule} from "@angular/router";
import {HeroService} from "../hero.service";
import {APP_BASE_HREF, Location} from "@angular/common";
import {ActivatedRouteStub} from "../testing/activated-route-stub";
import {HttpClientModule} from "@angular/common/http";

describe('HeroDetailComponent', () => {
  let component: HeroDetailComponent;
  let fixture: ComponentFixture<HeroDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({

      declarations: [ HeroDetailComponent ],
      imports: [
        FormsModule,
        RouterModule.forRoot([]),
        HttpClientModule
      ],
      providers: [
        {provide: APP_BASE_HREF, useValue: '/'},
        {
          provide: ActivatedRoute,
          useValue: {
            snapshot: {
              paramMap: {
                get(): number {
                  return 123;
                },
              },
            },
          },
        },
        HeroService,
        Location,
      ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeroDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
