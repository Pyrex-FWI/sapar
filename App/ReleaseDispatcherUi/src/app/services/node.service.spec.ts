import { TestBed } from '@angular/core/testing';

import { NodeService } from './node.service';
import {HttpClient, HttpHandler} from "@angular/common/http";
import {MessageService} from "./message.service";

describe('NodeService', () => {
  beforeEach(() => TestBed.configureTestingModule({
    "providers": [
      HttpClient,
      HttpHandler,
      MessageService,
    ],
  }));

  it('should be created', () => {
    const service: NodeService = TestBed.get(NodeService);
    expect(service).toBeTruthy();
  });
});
