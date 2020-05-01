import { TestBed } from '@angular/core/testing';

import { HeroService } from './hero.service';
import {HttpClient, HttpClientModule} from "@angular/common/http";
import {MessageService} from "./message.service";

describe('HeroService', () => {
  beforeEach(() => TestBed.configureTestingModule({
    imports: [
      HttpClientModule,
    ],
    providers: [
      HttpClient,
      MessageService,
    ]
  }));

  it('should be created', () => {
    const service: HeroService = TestBed.get(HeroService);
    expect(service).toBeTruthy();
  });
});
