import {Component, Input, OnInit} from '@angular/core';
import {NODE_TYPE_FOLDER, Node} from "../../../entities/node";
import {NodeService} from "../../../services/node.service";
import {MessageService} from "../../../services/message.service";

@Component({
  selector: 'app-node',
  templateUrl: './node.component.html',
  styleUrls: ['./node.component.scss']
})
export class NodeComponent implements OnInit {
  @Input() item: Node;

  currentClasses: {};

  constructor(
    private  nodeService: NodeService,
    public messageService: MessageService
  ) { }

  setCurrentClasses() {

    if(!this.item) return;

    this.currentClasses = {
      'caret': this.item.type == NODE_TYPE_FOLDER,
      'caret-down': this.item.type == NODE_TYPE_FOLDER &&this.item.isOpen(),
    }
  }

  ngOnInit() {
    this.setCurrentClasses()
  }

  collapse() {
    if (!this.item.hasChildren()) {
      //this.nodeService.addChildNodeIfEists(this.item);
    }

    this.item.opened = this.item.opened != true;
    this.messageService.add('Collapse from '+ this.item.name);

    this.setCurrentClasses();
  }

  showContent(item: Node) {

  }
}
