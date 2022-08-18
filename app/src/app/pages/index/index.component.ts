import { Component, OnInit } from '@angular/core';
import { BaseService } from 'src/app/service/base.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  specialites: number | undefined;
  classes: number | undefined;
  cm: number | undefined;
  exams: number | undefined;

  constructor(public indexSrv: IndexService) { }

  ngOnInit(): void {
    this.getNumberOfSpeciallites();
    this.getNumberOfClasses();
    this.getNumberOfCM();
    this.getNumberOfExams();
  }

  getNumberOfSpeciallites(){
    this.indexSrv.getSpecialites()
    .then((data: number) => {
      this.specialites = data;
      })
      .catch(() => { });
  }

  getNumberOfClasses(){
    this.indexSrv.getClasses()
    .then((data: number) => {
      this.classes = data;
      })
      .catch(() => { });
  }

  getNumberOfCM(){
    this.indexSrv.getCM()
    .then((data: number) => {
      this.cm = data;
      })
      .catch(() => { });
  }

  getNumberOfExams(){
    this.indexSrv.getExams()
    .then((data: number) => {
      this.exams = data;
      })
      .catch(() => { });
  }

}
