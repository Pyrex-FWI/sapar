import { TestBed, async } from '@angular/core/testing';
import { RouterTestingModule } from '@angular/router/testing';
import { AppComponent } from './app.component';
import {MatTabsModule} from "@angular/material/tabs";
import {TreeComponent} from "./components/folder/tree/tree.component";
import {MessagesComponent} from "./components/messages/messages.component";
import {NodeComponent} from "./components/folder/node/node.component";
import {HttpClientModule} from "@angular/common/http";

describe('AppComponent', () => {
  beforeEach(async(() => {
    TestBed.configureTestingModule({
      imports: [
        RouterTestingModule,
        MatTabsModule,
        HttpClientModule,
      ],
      declarations: [
        AppComponent,
        TreeComponent,
        MessagesComponent,
        NodeComponent,
      ],
    }).compileComponents();
  }));

  it('should create the app', () => {
    const fixture = TestBed.createComponent(AppComponent);
    const app = fixture.debugElement.componentInstance;
    expect(app).toBeTruthy();
  });

  // it(`should have as title 'ReleaseDispatcherUi'`, () => {
  //   const fixture = TestBed.createComponent(AppComponent);
  //   const app = fixture.debugElement.componentInstance;
  //   expect(app.title).toEqual('ReleaseDispatcherUi');
  // });

  // it('should render div with temp', () => {
  //   const fixture = TestBed.createComponent(AppComponent);
  //   fixture.detectChanges();
  //   const compiled = fixture.debugElement.nativeElement;
  //   expect(compiled.querySelector('div').textContent).toContain('Temp');
  // });
});
