import { Node } from './node';

describe('FolderItem', () => {
  it('should create an instance', () => {
    expect(new Node('name', 'vfs://someFile.mp3')).toBeTruthy();
  });
});
