
export const NODE_TYPE_FOLDER =  'folder';
export const NODE_TYPE_FILE =  'file';

export class Node {
  name: string;
  type: string;
  opened: boolean = false;
  children: Node[] = [];
  group: string;
  lang: string;
  year: number;
  path: string;

  constructor(
    name: string,
    path: string,
    children: Node[] = [],
    type: string = NODE_TYPE_FOLDER,
    opened: boolean = false
  ) {
    this.name = name;
    this.type = type;
    this.opened = opened;
    this.children = children;
  }

  isOpen(): boolean {
    return this.opened == true;
  }

  hasChildren(): boolean {
    return this.children.length > 0;
  }

  addChild(item: Node): Node {
    this.children.push(item);

    return this;
  }
}
