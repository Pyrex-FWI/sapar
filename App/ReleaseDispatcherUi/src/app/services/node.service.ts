import { Injectable } from '@angular/core';
import {NODE_TYPE_FILE, NODE_TYPE_FOLDER, Node} from "../entities/node";
import { Observable, of } from 'rxjs';
import { MessageService } from './message.service';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { catchError, map, tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class NodeService {

  private nodeesUrl = 'api/nodes';  // URL to web api

  constructor(
    private http: HttpClient,
    private messageService: MessageService
  ) { }

  /** Log a HeroService message with the MessageService */
  private log(message: string) {
    this.messageService.add(`NodeService: ${message}`);
  }

  getNodes(): Observable<Node[]> {
    return this.http.get<Node[]>(this.nodeesUrl)
      .pipe(
        map((data: any[]) => data.map((item: any) => new Node(
          item.name,
          item.path,
          [],
        ))),
        tap(_ => this.log('fetched nodes')),
        catchError(this.handleError<Node[]>('getNodes', []))
      );
  }

  /**
   * Handle Http operation that failed.
   * Let the app continue.
   * @param operation - name of the operation that failed
   * @param result - optional value to return as the observable result
   */
  private handleError<T> (operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {

      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);

      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }

  addChildNodeIfEists(item: Node) {
    console.log("add child");
    item.addChild(new Node('Sub Xx', 'vfs://toto'));
  }
}
