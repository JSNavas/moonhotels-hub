import { defineStore } from "pinia";
import { api } from "../utils/api";
import { Rooms } from "../types";

export const useRoomsStore = defineStore("rooms", {
  state: () => ({
    rooms: [] as Rooms[],
  }),
  actions: {
    async getRooms() {
      const response = await api.get<Rooms>("/search");
      this.rooms = response.data.rooms;
    },

    async filterRooms(data: any) {
      const params = new URLSearchParams(data).toString();
      console.log(params);
      const response = await api.get(`/search?${params}`);
      this.rooms = response.data.rooms;
    },
  },
});
