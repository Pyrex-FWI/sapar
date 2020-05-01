import {Component, Input, OnInit} from '@angular/core';
import {Node} from "../../../entities/node";

@Component({
  selector: 'app-tree',
  templateUrl: './tree.component.html',
  styleUrls: ['./tree.component.scss']
})
export class TreeComponent implements OnInit {
  @Input() treeItems: Node[] = [];

  constructor() { }

  ngOnInit() {
  }

}
