import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import {NODE_TYPE_FOLDER, Node} from "../../../entities/node";

import { NodeComponent } from './node.component';
import {HttpClientModule} from "@angular/common/http";
import {Component} from "@angular/core";

describe('NodeComponent', () => {
  let testHostComponent: TestHostComponent;
  let testHostFixture: ComponentFixture<TestHostComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      imports: [
        HttpClientModule,
      ],
      declarations: [
        NodeComponent,
        TestHostComponent,
      ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    testHostFixture = TestBed.createComponent(TestHostComponent);
    testHostComponent = testHostFixture.componentInstance;
    testHostFixture.detectChanges();
  });

  it('should create', () => {
    expect(testHostComponent).toBeTruthy();
  });
});

@Component({
  selector: `host-component`,
  template: `<app-node [item]="item"></app-node>`
})
class TestHostComponent {
  item: Node = new Node(
    'toto',
    'vfs://file.mp3'
    );
}
