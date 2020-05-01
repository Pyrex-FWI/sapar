import {Component, OnInit} from '@angular/core';
import {NODE_TYPE_FILE, NODE_TYPE_FOLDER, Node} from "./entities/node";
import {NodeService} from "./services/node.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{

    ngOnInit(): void {
        this.getNodes();
    }

  selectedItem = {};
  items: Node[] = [];
  constructor(private  nodeService: NodeService) {
  }

  getNodes(): void {
    this.nodeService.getNodes().
      subscribe(nodes => this.items = nodes);
  }

}
